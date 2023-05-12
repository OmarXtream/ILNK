<!DOCTYPE html>
<html>
<head>
  <title>{{$user->username}} - Menu</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Q5rz5Mkst5fWCT0mBv/OzM//p1ym0H0xZ5h+GvY3l5f5c5PzltC9f6NQcL95rlNvpG1b6Z1U6a/ASoCzGG6Ebg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles -->
  <style>
    .menu-item-card {
      margin-bottom: 30px;
    }
    .menu-item-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .menu-item-card .card-title {
      margin-bottom: 0;
      font-size: 1.5rem;
    }
    .menu-item-card .card-price {
      font-weight: bold;
    }
  </style>
      <link rel="icon" type="image/x-icon" href="{{$user->page->logoPath()}}">

</head>
<body>

  <div class="container my-5">

    <h1 class="text-center mb-5">{{$user->username}}</h1>

    <div class="row">
        @forelse($user->page->menuProducts as $pr)
      <div class="col-md-6 col-lg-4">
        <div class="card menu-item-card">
          <img class="img-fluid" src="{{$pr->image()}}" alt="{{$pr->title}}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$pr->title}}</h5>
            <p class="card-price"> {{$pr->price}} ريال</p>
          </div>
        </div>
      </div>
      @empty
      <h1 class="text-center">لا يوجد منتجات حالياً</h1>
      @endforelse
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>