Purchase Management System (PMS)

Overview
The Purchase Management System (PMS) is designed to streamline and manage purchasing activities, supplier relationships, and inventory tracking. This system ensures secure access for users, comprehensive management of suppliers and items, and the creation of detailed purchase orders and reports.


User Interface Technologies
•	PHP
•	HTML
•	CSS
•	JavaScript
•	Bootstrap


Database
•	Database Name: pms
•	Tables:
o	login_logout
o	supplier_list
o	item_list
o	new_purchase_order
o	user_list


Features
1. Secure Login/Logout and SignIn
•	Description: Secure login and logout functionality to ensure only authorized users can access the system.
•	Files:
o	LoginForm.html
o	Login.php
o	Logout.php
o	SignIn.php


2. HomePage
•	Description: The main dashboard of the system.
•	File:
o	Index.html


3. Manage Supplier List
•	Description: Admin can view, edit, and delete supplier details.
•	Supplier Details:
o	SupplierID
o	Supplier Name
o	Contact Person (Name)
o	Contact Email
o	Contact Phone Number
o	Address (State, Country)
o	Status (Active, Inactive)
•	Files:
o	SupplierList.php
o	editSupplierList.php
o	updateSupplier.php
o	deleteSupplierList.php


4. Manage Item List
•	Description: Admin can manage items, including viewing and editing item details.
•	Item Details:
o	ItemID
o	Item Name
o	Description
o	Unit Price
o	Quantity
o	Total Price
o	SupplierID
•	File:
o	ItemList.php


5. Create New Purchase Order
•	Description: Create, view, edit, and delete purchase orders.
•	Purchase Order Details:
o	POID (Purchase Order ID)
o	Vendor
o	PO Date
o	Delivery Date
o	Status (Pending, In Progress, Completed)
o	Total Amount
o	Address (Shipping Address, Billing Address)
o	Contact Person
o	ItemID
o	Quantity
•	Files:
o	NewPurchaseOrder.php
o	InsertPurchase.php
o	newPurchase.php
o	editPurchaseOrder.php
o	deletePurchaseOrder.php
o	updatePurchaseOrder.php


6. Manage User List
•	Description: Manage users, including viewing and editing user details.
•	User Details:
o	ID
o	Username
o	Email
o	Full Name
o	Address
o	Phone Number
o	Date Created
•	File:
o	UserList.php


7. Manage System/Company Information
•	Description: View system or company information.
•	Company Details:
o	Company Name
o	Address
o	Email
o	Phone Number
•	File:
o	CompanyInfo.html


8. Generate Purchase Reports
•	Description: Generate reports on purchasing activities.
•	Report Details:
o	PO Date
o	Delivery Date
•	File:
o	Report.php


9. Manage Account Details
•	Description: View and manage user account details.
•	File:
o	AccountDetails.php


Installation and Setup
1.	Clone the Repository:
git clone https://github.com/AdyaSharma02/PurchaseManagementSystem.git
2.	Navigate to the Project Directory:
cd PurchaseManagementSystem
3.	Setup Database:
o	Import the pms.sql file into your MySQL database.
4.	Configure Database Connection:
o	Update the database connection details in config.php.
5.	Run the Application:
o	Open the project in a local server environment (e.g., XAMPP, WAMP).
6.	Access the Application


Usage
1.	Login:
o	Enter your username and password on the login page.
2.	Navigate to Different Sections:
o	Use the navigation menu to access different sections like supplier list, item list, purchase orders, user management, and reports.
3.	Manage Suppliers:
o	Add, edit, or delete supplier information.
4.	Manage Items:
o	Add, edit, or delete item details.
5.	Create and Manage Purchase Orders:
o	Create new purchase orders and update or delete existing ones.
6.	Generate Reports:
o	Generate and view reports on purchase activities.
7.	Manage Users:
o	Add, edit, or delete user information.
8.	View Account Details:
o	View and update your account details.


Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
