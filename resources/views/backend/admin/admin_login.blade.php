<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin Login Form </title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>
         <div class="col-md-6">
           <h1 class="text-center">Admin Login Form</h1>

           <form class="mt-5" action="/admim/login" method="post">
             @csrf
             {{-- @if($errors->any())
                  @foreach ($errors->all() as $error)
                      <li class="text-black">{{ $error }}</li>
                  @endforeach
              @endif --}}

              @if (Session()->has('message'))
                <p>{{ Session()->get('message') }}</p>
              @endif
             <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" class="form-control">
              @if($errors->has('email'))
                   <span class="text-danger">{{ $errors->first('email') }}</span>
               @endif
             </div>
             <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control">
              @if($errors->has('password'))
                   <span class="text-danger">{{ $errors->first('password') }}</span>
               @endif
             </div>
             <div class="form-group">
              <label for=""></label>
              <button type="submit" name="button" class="btn btn-success mt-1">Login</button>
             </div>
           </form>
         </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
