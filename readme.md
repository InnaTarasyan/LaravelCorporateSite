# Full Functional Corporate Site
This is a full functional <i>Laravel Corporate</i> site. It has a very convenient <i>Admin 
Panel</i> with <i>CRUD</i> operations for data management

## Prerequisits
<ul>
  <li>Ensure you have PHP version 7.1.*</li>
  <li>Composer installed</li>
  <li>Laravel 5</li>
  <li>MySQL</li>
</ul>


## Running the site
After you have cloned or downloaded the project, navigate to the corresponding directory
<ul>
  <li>
       Install all the dependencies as specified in the composer.lock file (in your terminal). <br/>
       composer install <br/>
       php artisan vendor:publish
  </li>
  <li>
      Copy the .env.example file to the .env file, and set the corresponding keys:
      <ul>
         <li>The APP_URL key</li>
         <li>The THEME key</li>
         <li>DB_CONNECTION</li>
         <li>DB_HOST</li>
         <li>DB_PORT</li>
         <li>DB_DATABASE</li>
         <li>DB_USERNAME</li>
         <li>DB_PASSWORD</li>
         <li>MAIL_DRIVER</li>
         <li>MAIL_HOST</li>
         <li>MAIL_PORT</li>
         <li>MAIL_USERNAME</li>
         <li>MAIL_PASSWORD</li>
         <li>MAIL_ENCRYPTION</li>
      </ul>
  </li>
  <li>Generate Application Key: php artisan key:generate</li>
  <li>Create the corresponding empty Database</li>
  <li>
     Execute the migrations and run the seeders <br/> 
     php artisan migrate <br/>
     composer dump-autoload <br/>
     php artisan db:seed <br/>
  </li>
   <li>
        Run the site <br/>
        php artisan serve --host=your_host --port=your_port <br/> 
        Alternatively, create a virtual host. <br/>
    </li>
  <li>In order to navigate to the <i>Admin Panel</i> go to APP_URL/admin </li>
  <li>Login as <i>Super Admin</i> <br/> user: superadmin <br/> password: Testin876S4</li>
  <li>Login as <i>Admin</i> <br/> user:admin <br/> password: Testing876S4 </li>
</ul>

## Used Technologies
<ul>
  <li>The Pink Rio Template integrated</i>
  <li>Forms & HTML</li>
  <li>Laravel Menu</li>
  <li>Pagination</li>
  <li>Laravel Authorization</li>
  <li>Laravel Eloquent Relationships</li>
  <li>Gravatar integration</li>
  <li>CKEditor - WYSIWYG HTML editor</li>
  <li>Bootstrap FileStyle</li>
</ul>


## Pages
## Main Page 
   ### first part
![ScreenShot](https://i.imgur.com/8f4kj37.png)
 <br/> 
  ### second part
![ScreenShot](https://i.imgur.com/eUPQQ7T.png) 
<br/> <br/>

 ## Articles Page 
   ### first part
![ScreenShot](https://i.imgur.com/XegKJGC.png)
 <br/>
   ### second part
![ScreenShot](https://i.imgur.com/9MCGX2q.png)
 <br/> <br/>
 ## Article Details Page
  
![ScreenShot](https://i.imgur.com/omYJ1Am.png)
 <br/> <br/>


## Article Comments
![ScreenShot](https://i.imgur.com/cVV3PJQ.png)
 <br/> <br/>
 ## Submit Article Comment
![ScreenShot](https://i.imgur.com/mHGspew.png)
 <br/> <br/>


## Portfolios Page
  ### first part
![ScreenShot](https://i.imgur.com/5P4fAIO.png)
 <br/> 
  ### second part
![ScreenShot](https://i.imgur.com/hH8OnCw.png)
 <br/> <br/>
 
  ## Portfolios Details Page
   ### first part 
 ![ScreenShot](https://i.imgur.com/UzKrLMN.png)
  <br/> <br/>
 
## Contact Us Page
![ScreenShot](https://i.imgur.com/8gWK7Tc.png)
 <br/> <br/>
## Page Not Found 
![ScreenShot](https://i.imgur.com/STeVldk.png)

# Admin Panel
 ## Articles Page
![ScreenShot](https://i.imgur.com/QzlhfYb.png)

<br/><br/>
 ### first part
![ScreenShot](https://i.imgur.com/WnEL6aX.png)
 
 ### second part
![ScreenShot](https://i.imgur.com/u6RSaEk.png)
 
 
 <br/> <br/>
 
 ## Edit Permissions Page
 ![ScreenShot](https://i.imgur.com/nMcjWTD.png)
 
 ## Edit Menus Page
 ![ScreenShot](https://i.imgur.com/EtQORDg.png)