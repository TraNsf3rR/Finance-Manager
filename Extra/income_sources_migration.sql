-- Migration: Create income_sources table for user-specific income sources

CREATE TABLE `income_sources` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source_name` varchar(100) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `income_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_sources` (`user_id`),
  ADD CONSTRAINT `fk_user_sources` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `income_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Add some default sources for existing users
-- Insert these after running the above, replacing user_id values as needed
-- INSERT INTO `income_sources` (`user_id`, `source_name`) VALUES
-- (6, 'Current Workplace'),
-- (6, 'Freelance'),
-- (6, 'Investments');
