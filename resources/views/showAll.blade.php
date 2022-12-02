<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .gradient-custom-1 {
            /* fallback for old browsers */
            background: #cd9cf2;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to top, rgb(156, 165, 242), rgba(246, 243, 255, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to top, rgba(162, 163, 227, 0.637), rgba(186, 219, 239, 0.284))
        }

        .container {
            padding: 50px 0px;
        }


        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        tbody td {
            font-weight: 500;
            color: #999999;
        }
    </style>
</head>

<body>



    <section class="intro">

        <div class="gradient-custom-1 h-100">
            <form class="d-flex justify-content-end" action="" method="post">
                @csrf
                <button class="btn btn-primary mt-3" type="submit" name="logout">Logout</button>
            </form>

            <div class="mask flex-column d-flex align-items-center h-100">
                <div class="contrainer">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <select class="form-control" name="group">
                                    <option value="0">Tất cả các nhóm</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-control" name="time">
                                    <option value="0" {{ request()->time === '0' ? 'selected' : false }}>Tất cả
                                        thời
                                        gian</option>
                                    <option value="1" {{ request()->time === '1' ? 'selected' : false }}>1 tháng
                                        gần
                                        đây</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="search" name="keywords" class="form-control"
                                    value="{{ request()->keywords }}" placeholder="Nhập từ khóa tìm kiếm">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-block" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="table-responsive bg-white">
                                <table class="table mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">STT</th>
                                            <th scope="col"><a
                                                    href="?keywords={{ request()->keywords }}&sort-by=email&sort-type={{ isset($sortType) ? $sortType : 'asc' }} 
                                                    ">Email</a>
                                            </th>
                                            <th scope="col"><a
                                                    href="?keywords={{ request()->keywords }}&sort-by=created_at&sort-type={{ isset($sortType) ? $sortType : '' }}">Ngày
                                                    tạo</a>
                                            </th>
                                            {{-- <th scope="col">Ngày tạo</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allUser as $key => $value)
                                            <tr>
                                                <th scope="row" class="text-center">
                                                    {{ $key + 1 }}</th>
                                                <th scope="row" style="color: #666666;">{{ $value->username }}</th>
                                                <td>{{ $value->created_at }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                {{ $allUser->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


</body>

</html>
