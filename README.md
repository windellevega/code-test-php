Name:

Time Started: 7:30am
Time Finished: 

# PHP Code Test

What the app should do:

Using HTML, CSS, PHP and MySQL, create books website with the following functionalities:

- Basic CRUD (Add, Edit, Delete) of books 
- Book Fields: Title, ISBN, Author, Publisher, Year Published, Category (all are required)
- Search page given the ff. Title, ISBN, Author, Publisher, Year Published, Category
- Display paginated results.
- Show ability to sort books by column field in the backend or other approach
- * Use OOP approach on backend (class / functions).
- * Create popup modals to Add, Edit and Delete Books
- * Add Tabs for New Books Published and Old Archived Books
- Use CSS for proper styling of inventory and search results pages.

## Important

- Do not use the internet even for checking some php functions (Use your stock knowledge).

### Notes

- (*) Are Optional but a PLUS
- You can use the bootstrap library stored in this folder to help you for your frontend designs.
- Feel free to show off your different approach.


## Project Setup
1. After cloning the repository, create a `.env` file using `.env.example`
2. Run `composer install`
3. Create database and save the database name and credentials on your `.env` file
4. Run `php artisan key:generate` to generate application keys
5. Run `php artisan migrate` to migrate the tables to your database
6. Run `php artisan db:seed` to pre-load the database with some data
7. Serve the API `php artisan serve`
