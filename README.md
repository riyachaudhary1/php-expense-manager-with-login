# 💰 PHP Expense Manager with Login

<div align="center">

[![PHP](https://img.shields.io/badge/PHP-7.4+-purple?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-yellow?logo=javascript)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

**A secure, full-stack expense tracking application with user authentication, session management, and real-time expense tracking.**

[GitHub Repo](https://github.com/riyachaudhary1/php-expense-manager-with-login) • [Report Bug](https://github.com/riyachaudhary1/php-expense-manager-with-login/issues)

</div>

---

## 📋 Overview

PHP Expense Manager is a comprehensive personal finance application that helps users track their expenses, manage budgets, and analyze spending patterns. Built with PHP and MySQL, it provides secure user authentication and persistent data storage.

---

## ✨ Features

### 1. 🔐 User Authentication
- Secure user registration
- Login/Logout functionality
- Session management
- Password hashing with bcrypt
- Account security features
- Forgot password recovery

### 2. 💸 Expense Tracking
- Add/Edit/Delete expenses
- Categorize expenses
- Date-wise tracking
- Amount validation
- Description & notes
- Real-time updates

### 3. 📊 Budget Management
- Set monthly budgets
- Category-wise budget limits
- Budget vs. actual comparison
- Alert system for overspending
- Budget analytics

### 4. 📈 Analytics & Reports
- Monthly expense reports
- Category-wise breakdown
- Expense trends
- Spending patterns
- Comparative analysis
- Chart visualizations

### 5. 🏷️ Expense Categories
- Pre-defined categories (Food, Transport, Shopping, etc.)
- Custom category creation
- Category-wise summaries
- Top spending categories
- Category filters

---

## 🛠️ Technology Stack

### Backend
- **PHP 7.4+** - Server-side logic
- **MySQL 8.0** - Relational database
- **Session Management** - User authentication
- **PDO** - Database abstraction

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Responsive styling
- **JavaScript ES6+** - Interactive features
- **AJAX** - Real-time updates

### Security
- **Password Hashing** - bcrypt encryption
- **Prepared Statements** - SQL injection prevention
- **Session Tokens** - CSRF protection
- **Input Validation** - Data validation
- **Secure Headers** - HTTP security

---

## 📁 Project Structure
```
php-expense-manager-with-login/
├── index.php                 # Home page
├── login.php                 # Login form
├── register.php              # Registration form
├── dashboard.php             # Main dashboard
├── add_expense.php           # Add expense form
├── edit_expense.php          # Edit expense
├── delete_expense.php        # Delete expense
├── reports.php               # Analytics & reports
├── settings.php              # User settings
│
├── includes/
│   ├── config.php            # Database connection
│   ├── auth.php              # Authentication functions
│   ├── functions.php         # Utility functions
│   └── session.php           # Session management
│
├── css/
│   ├── style.css             # Main styles
│   └── responsive.css        # Mobile styles
│
├── js/
│   ├── main.js               # Main functionality
│   └── validation.js         # Form validation
│
└── database/
    └── schema.sql            # Database schema
```

---

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer 

### Installation
```bash
# 1. Clone repository
git clone https://github.com/riyachaudhary1/php-expense-manager-with-login.git

# 2. Navigate to directory
cd php-expense-manager-with-login

# 3. Create MySQL database
mysql -u root -p < database/schema.sql

# 4. Configure database
# Edit includes/config.php with your credentials:
define('DB_HOST', 'localhost');
define('DB_NAME', 'expense_manager');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');

# 5. Start local server
php -S localhost:8000

# 6. Access in browser
# http://localhost:8000
```

---

## 💾 Database Schema
```sql
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) UNIQUE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE expenses (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  category VARCHAR(50) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  description TEXT,
  expense_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  name VARCHAR(50) NOT NULL,
  icon VARCHAR(20),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE budgets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  category VARCHAR(50) NOT NULL,
  limit_amount DECIMAL(10,2) NOT NULL,
  month INT NOT NULL,
  year INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
```

---

## 🔐 Security Features

- ✅ Password hashing with bcrypt
- ✅ SQL injection prevention (Prepared Statements)
- ✅ CSRF token validation
- ✅ Session security
- ✅ Input validation & sanitization
- ✅ XSS protection
- ✅ HTTP security headers
- ✅ Secure cookie handling

---

## 📱 Usage

### User Registration
1. Click "Register" on login page
2. Enter username, email, password
3. Confirm password
4. Account created successfully

### Adding Expenses
1. Login to dashboard
2. Click "Add Expense"
3. Fill expense details:
   - Category
   - Amount
   - Date
   - Description
4. Save expense

### View Analytics
1. Go to "Reports" section
2. Select date range
3. View spending breakdown
4. Analyze trends
5. Download reports 

---

## 📊 Key Features Demo

### Dashboard
- Recent expenses list
- Monthly summary
- Category breakdown
- Quick add button
- Budget overview

### Reports
- Monthly reports
- Category-wise analysis
- Expense trends
- Budget status
- Export to PDF/CSV

### Settings
- Profile management
- Password change
- Category management
- Budget setup
- Notification preferences

---

## 🎓 Key Learning

- PHP backend development
- MySQL database design
- User authentication & security
- Session management
- CRUD operations
- Data validation
- REST principles
- MVC architecture
- Security best practices

---

## 🚀 Future Enhancements

- [ ] Recurring expenses
- [ ] Bill reminders
- [ ] Multi-user families
- [ ] Mobile app
- [ ] Cloud backup
- [ ] Advanced analytics
- [ ] API development
- [ ] Payment integration

---

## 📝 License

MIT License - See LICENSE file for details

---

## 👩‍💻 Author

**Riya Chaudhary** - [GitHub](https://github.com/riyachaudhary1)
