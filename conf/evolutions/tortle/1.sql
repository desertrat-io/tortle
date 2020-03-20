-- !Ups

CREATE TABLE `users`
(
    `id`                 BIGINT                                                          NOT NULL AUTO_INCREMENT,
    `id_uuid`            BINARY(16)                                                      NOT NULL DEFAULT UUID_TO_BIN(UUID()),
    `email`              VARCHAR(1000)                                                   NOT NULL,
    `first_name`         VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci        NOT NULL DEFAULT '',
    `last_name`          VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ciDEFAULT NULL,
    `password`           VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci        NOT NULL,
    `needs_verification` BOOLEAN                                                                  DEFAULT NULL,
    `created_on`         DATE                                                            NOT NULL DEFAULT now(),
    `last_seen`          DATE                                                                     DEFAULT now(),
    `remember_token`     VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci                 DEFAULT NULL,
    `is_locked`          BOOLEAN                                                         NOT NULL DEFAULT false,
    `is_deleted`         BOOLEAN                                                         NOT NULL DEFAULT false,
    UNIQUE KEY `email_idx` (`email`) USING BTREE,
    INDEX `id_idx` (`id`) USING BTREE,
    INDEX `uuid_id_idx` (`id_uuid`) USING BTREE,
    CONSTRAINT users_pk PRIMARY KEY (`id`, `id_uuid`)
) ENGINE = InnoDB;

CREATE TABLE `portals`
(
    `id`               BIGINT                                                   NOT NULL AUTO_INCREMENT,
    `id_uuid`          BINARY(16)                                               NOT NULL DEFAULT UUID_TO_BIN(UUID()),
    `portal_title`     VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `portal_desc`      VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
    `owner_id`         BINARY(16)                                               NOT NULL,
    `provider_id`      BINARY(16)                                                        DEFAULT NULL,
    `created_on`       DATE                                                     NOT NULL DEFAULT now(),
    `is_deleted`       BOOLEAN                                                  NOT NULL DEFAULT false,
    `portal_width`     INT UNSIGNED                                                      DEFAULT NULL,
    `horizontal_order` INT UNSIGNED                                                      DEFAULT NULL,
    INDEX `id_idx` (`id`) USING BTREE,
    INDEX `uuid_id_idx` (`id_uuid`) USING BTREE,
    INDEX `owner_id_idx` (`owner_id`) USING BTREE,
    CONSTRAINT portals_pk PRIMARY KEY (`id`, `id_uuid`)
) ENGINE = InnoDB;

create table accounts
(
    id               bigint unsigned auto_increment,
    id_uuid          binary(16)    default UUID_TO_BIN(UUID()) not null,
    user_id          bigint unsigned                           not null,
    first_name       varchar(255)  default ''                  not null,
    last_name        varchar(255)  default ''                  not null,
    location_city    varchar(50)   default null                null,
    location_region  varchar(50)   default null                null comment 'state, region, province, etc',
    location_country varchar(20)   default null                null,
    is_deleted       boolean       default false               not null,
    updated_at       date          default NOW()               null,
    avatar_url       varchar(1000) default '#'                 not null,
    constraint accounts_pk
        primary key (id),
    index `id_idx` (id) using btree,
    index `id_uuid_idx` (id_uuid) using btree,
    unique key `user_id_key` (user_id) using btree
) ENGINE = InnoDB;

-- !Downs

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS portals;
DROP TABLE IF EXISTS accounts;