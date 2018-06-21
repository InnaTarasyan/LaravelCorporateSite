# Full Functional Corporate Site

## Prerequisits
Ensure you have PHP version 7.1.*

## Running the site
After you have cloned or downloaded the project, navigate to the corresponding directory
<ul>
  <li>
       Install all the dependencies as specified in the composer.lock file (in your terminal). <br/>
       cd CorporateSite 
       composer install
  </li>
  <li>
      Copy the .env.example file to the .env file, and set the corresponding keys
  </li>
  <li>
      Run the site <br/>
      php artisan serve --host=your_host --port=your_port <br/> 
      Alternatively, create a virtual host. <br/>
  </li>
  <li>
     Execute the migrations and run the seeders <br/> 
     php artisan migrate <br/>
     composer dump-autoload <br/>
     php artisan db:seed <br/>
  </li>
</ul>

## Pages
## Main Page 
![ScreenShot](https://i.imgur.com/8f4kj37.png)
 <br/> 
![ScreenShot](https://i.imgur.com/eUPQQ7T.png) 
<br/> <br/>

 ## Articles Page 

![ScreenShot](https://i.imgur.com/XegKJGC.png)
 <br/>

![ScreenShot](https://i.imgur.com/9MCGX2q.png)
 <br/> <br/>
 ## Article Details Page

![ScreenShot](https://i.imgur.com/omYJ1Am.png)
 <br/> <br/>

 ## Portfolios Page
![ScreenShot](https://i.imgur.com/UzKrLMN.png)
 <br/> <br/>
## Portfolio Details Page 
![ScreenShot](https://i.imgur.com/5P4fAIO.png)
 <br/> 
![ScreenShot](https://i.imgur.com/hH8OnCw.png)
 <br/> <br/>
## Article Comments
![ScreenShot](https://i.imgur.com/cVV3PJQ.png)
 <br/> <br/>
 ## Submit Article Comment
![ScreenShot](https://i.imgur.com/mHGspew.png)
 <br/> <br/>
## Contact Us Page
![ScreenShot](https://i.imgur.com/8gWK7Tc.png)
 <br/> <br/>
## Page Not Found 
![ScreenShot](https://i.imgur.com/STeVldk.png)

