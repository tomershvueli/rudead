ALTER TABLE tokens ENGINE = InnoDB;
ALTER TABLE users CHANGE last_checked last_checked TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `tokens` ADD INDEX(`user_id`); 
ALTER TABLE `tokens` ADD CONSTRAINT `fk_t_userid` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 