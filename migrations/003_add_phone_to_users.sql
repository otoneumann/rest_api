USE rest_api;

ALTER TABLE users
    ADD COLUMN phone VARCHAR(20) NULL AFTER email;
