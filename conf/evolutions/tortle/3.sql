-- !Ups

CREATE TABLE `registrations`
(
    `id`          BIGINT unsigned NOT NULL AUTO_INCREMENT,
    `id_uuid`     BINARY(16)      NOT NULL,
    `user_id`     BIGINT UNSIGNED NOT NULL,
    `token`       VARCHAR(255)    NOT NULL,
    `is_verified` BOOLEAN         NOT NULL DEFAULT false,
    `is_expired`  BOOLEAN         NOT NULL DEFAULT false,
    `ip`          VARCHAR(15),
    `location`    POINT           NOT NULL,
    `user_agent` VARCHAR(300),
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `verified_at` TIMESTAMP DEFAULT NULL,
    `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE,
    `deleted_at` TIMESTAMP DEFAULT NULL,

    SPATIAL INDEX `SPATIAL` (`location`),
    CONSTRAINT registrations_pk PRIMARY KEY (`id`, `id_uuid`),
    FOREIGN KEY `registrations_users_fk` (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB;

CREATE TRIGGER before_insert_registrations
    BEFORE INSERT ON registrations
    FOR EACH ROW
    SET NEW.id_uuid = UUID_TO_BIN(UUID());
-- !Downs

DROP TRIGGER IF EXISTS before_insert_registrations;
DROP TABLE IF EXISTS `registrations`;