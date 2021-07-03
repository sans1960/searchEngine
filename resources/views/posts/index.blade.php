<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel Search</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
          <div class="container">
              <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                  <div class="search w-50">
                      <h1 class="mb-5 text-center">Search with Ajax</h1>
                      <form action="#" id="search-form">
                          @csrf
                          <div class="row">
                              <div class="col-12" id="search-wrapper">
                                  <input type="text" class="m-0 form-control w-100 search" placeholder="What are you looking for .. ">

                                  <div id="results">

                                  </div>
                              </div>
                          </div>
                      </form>

                      <div id="post" class="mt-5">

                      </div>
                  </div>
              </div>
          </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <script>
        $(function ()
        {
            'use strict';

            $(document).on('keyup', '#search-form .search', function ()
            {
                if($(this).val().length > 0)
                {
                    var search = $(this).val();

                    $.get("{{ route('posts.search') }}", {search: search}, function (res)
                    {
                        $('#results').html(res);
                    });

                    return;
                }

                $('#results').empty();
            });

            $(document).on('click', '.post-link', function ()
            {
                var postId = $(this).data('id');

                $.get("{{ url('posts/show') }}", {id: postId}, function (res)
                {
                    $('#results').empty();
                    $('.search').val('');
                    $('#post').html(res);
                });
            });
        });
        </script>
    </body>
</html>
