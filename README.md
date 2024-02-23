# Task: 
Create an API for a blog post website. You need 4 different endpoints

# Endpoints
- Create Post
- Get Post
- Get All Posts
- Update Post
- Delete Posts

# Documentation

### API
- An API is a collection of programs that allows two or more computers to communicate with each other.
- Every online website or application uses an API to communicate data between the server(backend) to the frontend.
- Every API has a specific folder structure so it can be easily read from the programmer.
- On every API you will always see 3 folders **Model**, **View** & **Controller**.

### Controllers
- A controller is usually a PHP Class where all the logic is put together. For example 

```
<?php

class StoreController
{
    public function delete(
        FormRequest       $request,
        StoreExistService $storeExistService,
        StoreDeleteService $storeDeleteService
    ) {
        // checks if the store exists
        $store = $storeExistService->execute($request);

        // deletes the store
        $storeDeleteService->execute($store);

        return 'Store Deleted!';
    }
}
```

### Models

### Views

### SQL
- [SQL Online Compiler](https://onecompiler.com/mysql)
- [What is SQL Language](https://www.youtube.com/watch?v=zsjvFFKOm3c)
- [Mysql the basics](https://www.youtube.com/watch?v=Cz3WcZLRaWc)
- [SQL Quick Learn Doc.](https://learnxinyminutes.com/docs/sql/)
- [SQL Cheatsheet (Learn the basic SQL Syntax).](https://www.sqltutorial.org/wp-content/uploads/2016/04/SQL-cheat-sheet.pdf)