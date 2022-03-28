<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<h1>Hello</h1>

    {{-- @foreach ($users as  $user)
      <h1>{{  $user->name }}</h1>
      <p>{{ $user->address->country }}</p>
    @endforeach --}}

    @foreach ($users as  $user)
      <h1>{{  $user->name }}</h1>
      @foreach ($user->posts as $post)
           <p>{{ $post->title  }}</p>
      @endforeach
    @endforeach
  </body>
</html>
