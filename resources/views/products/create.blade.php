@extends('products.layout')

@section('content')




    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mt-5">
            <h5 class="fas fa-plus-square card-header bg-primary text-white"> เพิ่มข้อมูลโครงการ </h5>
            <div class="row mt-2">
                <div class="col-3">

                </div>
                <div class="col-6">
                    <div class="form-group mt-1">
                        <label for="exampleInputEmail1">ชื่อโครงการ :</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">หน่วยงาน :</label>
                        <select class="form-control col-4" required name="dep_id" >
                            @foreach($dep as $list)
                                <option value="{{$list->id}}">{{$list->Dep}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">วันที่แจ้ง :</label>
                        <input type="text" name="Dete"  class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">หมายเหตุ :</label>
                        <input type="text" name="Note" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-success add" type="button" id="inputGroupFileAddon03">Add</button>
                            <button class="btn btn-outline-danger remove" type="button" id="inputGroupFileAddon03">Remove</button>
                        </div>
                        <input type="file" accept=".docx,.pdf" name="File[]" required>
                    </div>
                    <div id="new_chq"></div>
                    <input type="hidden" value="1" id="total_chq">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">บันทึกข้อมูล</button>
                        <a class="btn btn-primary btn-block" href="{{url('/products')}}">กลับสู้หน้าแรก</a>
                    </div>
                </div>
                <div class="col-3">

                </div>
            </div>
        </div>
        </div>


    </form>
@endsection

@section('sc_js')
<script>
    $('.add').on('click', add);
    $('.remove').on('click', remove);

    function add() {
        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = '<div class="input-group mb-3" id="new_'+new_chq_no+'">\n' +
            '                        <input type="file" accept=".docx,.pdf" name="File[]" required>\n' +
            '                    </div>';

        $('#new_chq').append(new_input);

        $('#total_chq').val(new_chq_no);
    }

    function remove() {
        var last_chq_no = $('#total_chq').val();

        if (last_chq_no > 1) {
            $('#new_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
    }
</script>
@endsection
