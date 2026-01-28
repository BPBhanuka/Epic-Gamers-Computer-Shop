# 🖥️ Epic Gamers - Computer Shop E-commerce Platform

**Epic Gamers** is a modern website designed to sell computer parts and accessories online. It includes all the essential features that the user needs to easily search and purchase products.

---

## 🚀 Main Features 
* **Dynamic Product Catalog:**  
* **User Authentication:** 
* **Shopping Cart:**  
* **Watchlist:**  
* **Search & Filter:**  
* **Responsive Design:**  

---

## 🛠️ Tech Stack  
* **Frontend:** HTML5, CSS3, JavaScript (Bootstrap).
* **Backend:** PHP.
* **Database:** MySQL.
* **Tools:** Git, VS Code, XAMPP.

---

## ⚙️ Installation & Setup Guide
Follow these steps to set up the project on your local machine:

1. Prerequisites
    Ensure you have the following installed:

    XAMPP / WAMP (for Apache and MySQL server)
    PHP (Version 8.0 or higher recommended)
    Git (for cloning the repository)

2. Clone the Repository
    Open your terminal or command prompt and run the following command:

    git clone https://github.com/BPBhanuka/Epic-Gamers-Computer-Shop.git

3. Database Configuration
    Start Apache and MySQL from your XAMPP Control Panel.
    Open your browser and go to http://localhost/phpmyadmin/.
    Create a new database named epic_gamers_db.
    Select the database and click on the Import tab.
    Choose the .sql file located in the project folder (e.g., database/db.sql) and click Go.

4. Setup Environment Variables
    Locate the database connection file (usually config.php or db_connect.php).

    Update the database credentials to match your local setup:

        $host = "localhost";
        $user = "root";
        $password = ""; // Default is empty for XAMPP
        $dbname = "epic_gamers_db";

5. Run the Application
    Move the project folder to your htdocs directory (if it's not already there).

    Open your browser and navigate to:
    http://localhost/Epic-Gamers-Computer-Shop/