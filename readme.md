# Billings App



A laravel app that bills users simultaneouly by calling an External Api 

For this project i mocked the Api using Php Sleep function 
sleep(1.6)


# The project was tackled using Two Approcahes

### Retriving Users calling api and iterating through them using Laravel Eloquent Chunk

run code by 
## run php artisan serve
## got to route /processuserbills


### To scale the App i created a Job That runs on the Background i also added index to the database to aid fast retrival of data.

using a job with say redis is fast and gives room for doing others things while the Job runs in the background

run code by 
## run php artisan serve
## got to route /processbilling
## on command line run php artisan queue:work