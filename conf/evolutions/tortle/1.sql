-- !Ups

CREATE TABLE `users`
(
    `id`                 BIGINT unsigned                                          NOT NULL AUTO_INCREMENT,
    `id_uuid`            BINARY(16)                                               NOT NULL,
    `email`              VARCHAR(60)                                            NOT NULL,
    `first_name`         VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
    `last_name`          VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci          DEFAULT '',
    `password`           VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `needs_verification` BOOLEAN                                                           DEFAULT NULL,
    `created_on`         TIMESTAMP                                                NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_seen`          TIMESTAMP                                                         DEFAULT CURRENT_TIMESTAMP,
    `remember_token`     VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci          DEFAULT NULL,
    `is_locked`          BOOLEAN                                                  NOT NULL DEFAULT false,
    `is_deleted`         BOOLEAN                                                  NOT NULL DEFAULT false,
    UNIQUE KEY `email_key` (`email`) USING BTREE,
    CONSTRAINT users_pk PRIMARY KEY (`id`)
) ENGINE = InnoDB;

create table accounts
(
    id               bigint unsigned auto_increment,
    id_uuid          binary(16)                              not null,
    user_id          bigint unsigned                         not null,
    first_name       varchar(255)  default ''                not null,
    last_name        varchar(255)  default ''                not null,
    location_city    varchar(50)   default null              null,
    location_region  varchar(50)   default null              null comment 'state, region, province, etc',
    location_country varchar(20)   default null              null,
    is_deleted       boolean       default false             not null,
    updated_at       TIMESTAMP     default CURRENT_TIMESTAMP null,
    avatar_url       varchar(1000) default '#'               not null,
    constraint accounts_pk
        primary key (id)
) ENGINE = InnoDB;

CREATE TABLE `portals`
(
    `id`               BIGINT unsigned                                          NOT NULL AUTO_INCREMENT,
    `id_uuid`          BINARY(16)                                               NOT NULL,
    `portal_title`     VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `portal_desc`      VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
    `owner_id`         BINARY(16)                                               NOT NULL,
    `provider_id`      BINARY(16)                                                        DEFAULT NULL,
    `created_on`       TIMESTAMP                                                NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `is_deleted`       BOOLEAN                                                  NOT NULL DEFAULT false,
    `portal_width`     INT UNSIGNED                                                      DEFAULT NULL,
    `horizontal_order` INT UNSIGNED                                                      DEFAULT NULL,
    CONSTRAINT portals_pk PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TRIGGER before_insert_users
    BEFORE INSERT ON users
    FOR EACH ROW
    SET NEW.id_uuid = UUID_TO_BIN(UUID());

CREATE TRIGGER before_insert_portals
    BEFORE INSERT ON portals
    FOR EACH ROW
    SET NEW.id_uuid = UUID_TO_BIN(UUID());

CREATE TRIGGER before_insert_accounts
    BEFORE INSERT ON accounts
    FOR EACH ROW
    SET NEW.id_uuid = UUID_TO_BIN(UUID());

-- !Downs

DROP TRIGGER IF EXISTS before_insert_users;
DROP TRIGGER IF EXISTS before_insert_portals;
DROP TRIGGER IF EXISTS before_insert_accounts;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS portals;
DROP TABLE IF EXISTS accounts;