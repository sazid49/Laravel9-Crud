<!DOCTYPE html>
<html lang="en">
<head>
  <title>Categories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
</head>
<body>

<div class="container pt-5">
  <h2 class="text-center">New  Categories <a class="btn btn-info" href="/">All Category</a></h2>
   <div class="row">
     <div class="col-sm-4">
       <form  action="/category-update/{{ $categories->id }}" method="post" enctype="multipart/form-data">
         @csrf

         <label for="">Title</label>
         <input type="text" name="title" class="form-control" value="{{ $categories->title }}">

         <div class="form-group">
           <label for="">Image</label>
           <div class="form-group">
             <label>Old Image</label>
             <img src="/allImage/{{ $categories['image'] }}" height="100px" width="200px">
           </div>
           <input type="file" name="image">

         </div>
         <button type="submit" class="bn btn-info mt-4">Create</button>
       </form>
     </div>
   </div>
</div>
</body>
</html>
