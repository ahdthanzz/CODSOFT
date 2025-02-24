-- Create the database (if it doesn't exist already)
CREATE DATABASE IF NOT EXISTS sales_performance;

-- Use the created database
USE sales_performance;

-- Create Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('manager', 'supervisor', 'team_leader', 'agent', 'cashier', 'advisor') NOT NULL,
    agent_code VARCHAR(5) UNIQUE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Invoices Table
CREATE TABLE invoices (
    invoice_id INT AUTO_INCREMENT PRIMARY KEY,
    branch_code VARCHAR(20) NOT NULL,
    supervisor_code VARCHAR(20),
    team_leader_code VARCHAR(20),
    sales_agent_code VARCHAR(20),
    invoice_date DATE NOT NULL,
    policy_number VARCHAR(20) UNIQUE NOT NULL,
    premium_amount DECIMAL(10, 2) NOT NULL,
    payment_frequency ENUM('Monthly', 'Quarter', 'Bi-Annual', 'Annual') NOT NULL,
    agent_signature ENUM('Yes', 'No') NOT NULL,
    cash_hand_over_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Sales Performance Table
CREATE TABLE sales_performance (
    performance_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    month VARCHAR(20) NOT NULL,
    year INT NOT NULL,
    new_policies INT DEFAULT 0,
    premium_collected DECIMAL(10, 2) DEFAULT 0.00,
    target_policies INT DEFAULT 0,
    target_premium DECIMAL(10, 2) DEFAULT 0.00,
    performance_percentage DECIMAL(5, 2) DEFAULT 0.00,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Create Promotions Table
CREATE TABLE promotions (
    promotion_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    promoted_to_role ENUM('supervisor', 'team_leader', 'manager', 'advisor') NOT NULL,
    promoted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert some sample data into the users table (this is for testing purposes)
INSERT INTO users (username, password, role, agent_code) VALUES 
('manager1', 'password1', 'manager', '10001'),
('supervisor1', 'password2', 'supervisor', '20001'),
('team_leader1', 'password3', 'team_leader', '30001'),
('agent1', 'password4', 'agent', '40001'),
('cashier1', 'password5', 'cashier', NULL),
('advisor1', 'password6', 'advisor', '50001');

-- Insert sample performance data (this is for testing purposes)
INSERT INTO sales_performance (user_id, month, year, new_policies, premium_collected, target_policies, target_premium) VALUES 
(1, 'January', 2025, 50, 1000000.00, 60, 1200000.00),
(2, 'January', 2025, 40, 800000.00, 50, 1000000.00),
(3, 'January', 2025, 30, 600000.00, 40, 800000.00),
(4, 'January', 2025, 20, 400000.00, 30, 600000.00);

-- Insert sample invoices data
INSERT INTO invoices (branch_code, supervisor_code, team_leader_code, sales_agent_code, invoice_date, policy_number, premium_amount, payment_frequency, agent_signature, cash_hand_over_date) VALUES
('KB-01', '12379', '27435', '40360', '2024-04-04', '13459844', 1788.00, 'Monthly', 'Yes', '2024-04-05'),
('KB-02', '12380', '27436', '40361', '2024-04-10', '13459845', 2500.00, 'Quarter', 'Yes', '2024-04-12');

-- Sample data for promotions
INSERT INTO promotions (user_id, promoted_to_role) VALUES 
(4, 'team_leader'),
(3, 'supervisor'),
(2, 'manager');
