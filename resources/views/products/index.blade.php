@extends('products.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{--    <table id="example" class="table table-striped table-bordered" style="width:100%">--}}
    {{--        <tr>--}}
    {{--            <th>No</th>--}}
    {{--            <th>Name</th>--}}
    {{--            <th>Details</th>--}}
    {{--            <th width="280px">Action</th>--}}
    {{--        </tr>--}}
    {{--        <tbody>--}}
    {{--        @foreach ($products as $i => $product)--}}
    {{--            <tr>--}}
    {{--                <td>{{ ++$i }}</td>--}}
    {{--                <td>{{ $product->Nameproject }}</td>--}}
    {{--                <td>--}}
    {{--                    @foreach($dep as $list)--}}
    {{--                        @if($list->id == $product->dep_id)--}}
    {{--                            {{$list->Dep}}--}}
    {{--                        @endif--}}
    {{--                    @endforeach--}}
    {{--                </td>--}}
    {{--                <td>--}}
    {{--                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">--}}

    {{--                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>--}}

    {{--                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>--}}

    {{--                        @csrf--}}
    {{--                        @method('DELETE')--}}

    {{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
    {{--                    </form>--}}
    {{--                </td>--}}
    {{--            </tr>--}}

    {{--        @endforeach--}}
    {{--        </tbody>--}}
    {{--    </table>--}}

    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
        <tr>
            <th>ชื่อโครงการ</th>
            <th>หน่วยงาน</th>
            <th>วันที่แจ้ง</th>
            <th>หมายเหตุ</th>
            <th>ไฟล์ที่อัพโหลด</th>
            <th>

                <a class="btn btn-success fas fa-plus-square " href="{{ route('products.create') }}">
                    เพิ่มข้อมูล Service
                </a>

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $i => $product)
            <tr>
                <td>{{ $product->Nameproject }}</td>
                <td>
                    @foreach($dep as $list)
                        @if($list->id == $product->dep_id)
                            {{$list->Dep}}
                        @endif
                    @endforeach
                </td>
                <td>{{ $product->Dete }}</td>
                <td>{{ $product->Note }}</td>
                <td>
                    <a href="{{url('/test/' . $product->File)}}" target="_blank">
                        {{ $product->File }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <div class="card">
                            <a class="btn btn-primary fas fa-edit" href="{{ route('products.edit',$product->id) }}">
                                Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger fas fa-trash-alt"> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
@section('sc_js')

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
