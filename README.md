<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4;
            margin: 20mm;
            background-color: #ffffff;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 30pt 20pt;
            text-align: center;
            border-radius: 0 0 10px 10px;
            margin-bottom: 30pt;
        }
        h1 { margin: 0; font-size: 24pt; }
        h2 { 
            color: #2980b9; 
            border-bottom: 2px solid #ecf0f1; 
            padding-bottom: 5pt; 
            margin-top: 25pt;
            font-size: 16pt;
        }
        h3 { color: #34495e; font-size: 13pt; }
        .section { margin-bottom: 20pt; }
        code {
            background-color: #f4f4f4;
            padding: 2pt 5pt;
            border-radius: 3pt;
            font-family: 'Courier New', Courier, monospace;
            font-size: 10pt;
        }
        pre {
            background-color: #f8f9fa;
            border-left: 4px solid #2980b9;
            padding: 10pt;
            overflow-x: auto;
            font-family: 'Courier New', Courier, monospace;
            font-size: 9pt;
            line-height: 1.4;
        }
        ul { padding-left: 20pt; }
        li { margin-bottom: 5pt; }
        .footer {
            margin-top: 50pt;
            padding-top: 10pt;
            border-top: 1px solid #eee;
            font-size: 10pt;
            color: #7f8c8d;
            text-align: center;
        }
        .badge {
            display: inline-block;
            background: #e74c3c;
            color: white;
            padding: 2pt 8pt;
            border-radius: 10pt;
            font-size: 9pt;
            font-weight: bold;
            margin-bottom: 10pt;
        }
        .file-tree {
            background-color: #2d3436;
            color: #dfe6e9;
            padding: 15pt;
            border-radius: 5pt;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Shopping Website Project</h1>
        <p>PHP & MySQL Full-Stack Application</p>
    </div>

    <div class="section">
        <span class="badge">College Submission</span>
        <h2>1. Project Overview</h2>
        <p>
            This project is a lightweight, responsive e-commerce application designed to demonstrate 
            server-side scripting with PHP and relational database management with MySQL. It features 
            dynamic product rendering, a session-based shopping cart, and a modular architecture.
        </p>
    </div>

    <div class="section">
        <h2>2. Key Features</h2>
        <ul>
            <li><strong>Dynamic Catalog:</strong> Real-time fetching of items from MySQL.</li>
            <li><strong>Shopping Cart:</strong> Persistent item storage during the browsing session.</li>
            <li><strong>Database Driven:</strong> Centralized management of product names, prices, and images.</li>
            <li><strong>Modular Design:</strong> Separation of logic (PHP), styling (CSS), and layout (Includes).</li>
        </ul>
    </div>

    <div class="section">
        <h2>3. File Structure</h2>
        <pre class="file-tree">
shopping-site/
├── assets/             # CSS, JS, and Product Images
├── config/             # Database connection (db.php)
├── includes/           # Reusable UI (header.php, footer.php)
├── sql/                # MySQL database export file
├── index.php           # Homepage / Product listing
├── product.php         # Product detail view
├── cart.php            # Shopping cart logic
└── README.html         # Project Documentation
        </pre>
    </div>

    <div class="section">
        <h2>4. Setup & Installation</h2>
        <h3>Step 1: Database Import</h3>
        <p>Open <code>phpMyAdmin</code>, create a database named <code>shop_db</code>, and import the <code>sql/shop_db.sql</code> file.</p>
        
        <h3>Step 2: Server Configuration</h3>
        <p>Ensure your local server (XAMPP/WAMP/Linux) is pointing to the project directory. Update <code>config/db.php</code> with your local credentials:</p>
        <pre>
$host = 'localhost';
$user = 'root';
$pass = ''; // Default for XAMPP
        </pre>

        <h3>Step 3: Launch</h3>
        <p>Navigate to <code>http://localhost/shopping-site</code> in your web browser.</p>
    </div>

    <div class="footer">
        <p>Submitted by: <strong>Sahil</strong> | Full-Stack Development Student</p>
    </div>
</body>
</html>