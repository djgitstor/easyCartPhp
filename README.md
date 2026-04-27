<h1>🛒 Shopping Website Project</h1>
    <p><strong>Developed by:</strong> Sahil</p>
    <p><strong>Target:</strong> College Project Submission (Full-Stack PHP/MySQL)</p>

    <div class="info-box">
        This is a basic e-commerce platform demonstrating CRUD operations, session-based cart management, and relational database integration.
    </div>

    <h2>📂 Project Structure</h2>
    <pre>
shopping-site/
├── assets/             # CSS, JS, and Images
├── config/             # Database connection (db.php)
├── includes/           # Header and Footer components
├── sql/                # MySQL Export file (shop_db.sql)
├── index.php           # Home / Product Listing
├── product.php         # Product details
├── cart.php            # Shopping Cart logic
└── README.html         # This documentation
    </pre>

    <h2>🛠️ Setup Instructions</h2>
    <ol>
        <li><strong>Import Database:</strong> Go to phpMyAdmin, create <code>shop_db</code>, and import <code>sql/shop_db.sql</code>.</li>
        <li><strong>Config:</strong> Open <code>config/db.php</code> and set your database user/password.</li>
        <li><strong>Run:</strong> Place the folder in <code>htdocs</code> and visit <code>localhost/shopping-site</code>.</li>
    </ol>

    <h2>🚀 Key Features</h2>
    <ul>
        <li>Dynamic product fetching using PHP/PDO.</li>
        <li>Session-based Add-to-Cart functionality.</li>
        <li>Responsive UI for mobile and desktop.</li>
        <li>Clean, modular code structure.</li>
    </ul>