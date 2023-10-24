# Books Store

## Process

1- Clone the project using "git clone https://github.com/deepeshrastogi/book_store.git"

2- There are two folders inside the book_store folder - admin, customer


## Setup admin
1 - Create a new database "books_store"

2 - Rename file .env.example to .env

3 - Run the command "npm install"

4 - Run the command "composer update"

5 - Run the command "npm run build" and then exit

6 - Run the command "php artisan migrate"

7 - Run command "php artisan serve --port=8081"

8 - Create a new account/Login

9 - On the Dashboard page click on the "Bulk Import" button, then run the command "php artisan queue:work"

10 - Now Books list is displayed on the Books page, Admin will take actions like create, view, edit, and delete the book.

## Screenshot of admin for books like lists, creation, view, and details

![Books_list](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/9013ed98-7d28-4e20-b35e-d2a7d7490942)
![bulk_import_books_data](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/99a531fd-f48e-40c7-88cd-e783536c9ff2)
![bulk_import_books_with_data](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/9b1b063d-99dd-4634-ab53-808d3a26f48c)
![admin_signup](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/f0811b41-ead0-4e69-819c-116669dc7a10)
![book_details_page](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/0b77ca53-1f5a-436d-ba38-55b3239ecfb8)
![book_edit_page](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/3fd77f01-4224-40df-a816-5d6113b136a2)



## Setup customer

1 - Run the command "npm install"

2 - Run the command "npm run serve --port=8080"


## Screenshot of customer for search books

![search](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/e635773e-a7dc-42b7-b4e4-261065249d75)
![book_details_by_search](https://github.com/deepeshrastogi/Packt_Assessment/assets/38438355/0d064521-6ac0-4a95-83db-06ce229cccac)
