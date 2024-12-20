# Setting Up the CI4-EcoTrack Project

## Step 1: Create the Database in phpMyAdmin
1. Open phpMyAdmin in your browser.
2. Create a new database:
   - Enter `ecotrack` as the database name.
   - Click **Create**.

## Step 2: Import the SQL File
1. Select the `ecotrack` database from the list on the left panel.
2. Click on the **Import** tab at the top of the page.
3. Click **Choose File** and navigate to the SQL file:
   - Path: `C:\your-path\EcoTrack-GroupProject\ecotrack.sql`
4. Click **Go** to import the SQL file.

### Option 2: Paste the SQL Code Manually
1. Select the `ecotrack` database from the list on the left panel.
2. Click on the **SQL** tab at the top of the page.
3. Open the `ecotrack.sql` file in a text editor.
4. Copy the entire contents of the file.
5. Paste the contents as an SQL query in phpMyAdmin.
6. Click **Go** to execute the query.

## Step 1: Copy Project Files
1. Clone this repository into your **htdocs** folder:  
[https://github.com/FionnOReilly/EcoTrack-GroupProject.git](https://github.com/FionnOReilly/EcoTrack-GroupProject.git)

2. Switch to the branch called **'backupMaster'**, as that is the branch with the working project.

## Step 2: Configure XAMPP Apache
1. Open the XAMPP control panel.
2. Click on **Config** Apache and select `httpd.conf`.
3. Modify the following settings:
    - Press `CTRL+F` to find `AllowOverride`. Change the default setting from `none` to `All`.
    - Search for `mod_rewrite.so` to find this line: 
            LoadModule rewrite_module modules/mod_rewrite.so
      
      Uncomment this line by removing the `#` at the start.
4. Search for 'Listen 80' and change it to:
     ```plaintext
     Listen 8081
     ```
5. Search for 'ServerName localhost:80' and change it to:
   ```plaintext
     ServerName localhost:8081
     ```

6. Save your changes and restart Apache.

## Set Up API Endpoints in `Routes.php` located in `app/config/routes.php` 
 API endpoints need to be added inside the `Routes.php` file:
     ```plaintext
     $routes->get('wastelog', 'WasteLogController::index');
     ```


## Step 3: Set Up the Environment File
1. Copy the `env` file located inside - 'C:\xampp\htdocs\CI4-EcoTrack'.
2. Rename the file to `.env`.
3. Update the environment settings:
```php
    ```plaintext
    CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public';
    
    database.default.hostname = localhost
    database.default.database = ecotrack
    database.default.username = root
    database.default.password = 
    database.default.DBDriver = MySQLi
    database.default.DBPrefix =
    database.default.port = 3306
    ```

## Step 4: Configure the Vue Frontend
1.Navigate to the Vue project folder using the terminal:
    ```bash
    cd C:/your-path/GitHub/EcoTrack-GroupProject/vue-frontend
    ```
2. Run the following commands to set up the Vue frontend:
    - Install project dependencies:
      ```bash
      npm install
      ```
    - Install the Vue Router for navigation:
      ```bash
      npm install vue-router
      ```
    - Install Axios for HTTP requests:
      ```bash
      npm install axios
      ```

     - To Run the Vue front end project 
      ```bash
      npm run serve 
      ```
 4. **Click the local link that appears in the terminal** 
 (e.g., `http://localhost:8082/`) to open the Vue application in your browser.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

