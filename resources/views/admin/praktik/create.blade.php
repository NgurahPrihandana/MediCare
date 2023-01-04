@extends('admin.layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-danger">Form Tambah Data Praktik</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
              <label for="nama_doctor" class="form-label">Nama Doctor</label>
              <select class="form-control form-select-lg mb-3" name="" id="doctor_id" aria-label=".form-select-lg example">
                <option selected disabled hidden>Pilih Salah Satu Dokter</option>
                @foreach($data_doctor as $item)
                    <option value={{$item->doctor_id}}>{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="spesialis" class="form-label">Spesialis</label>
              <input type="text" class="form-control" id="spesialis" value="" disabled>
            </div>
            <div class="mb-3">
              <label for="nomor_telepon" class="form-label">Hari</label>
              <select class="form-control form-select-lg mb-3" name="" id="id_jadwal" aria-label=".form-select-lg example">
                <option selected disabled hidden>Pilih Salah Satu Hari</option>
                @foreach($data_jadwal as $item)
                    <option value={{$item->id_jadwal}}>{{$item->hari}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="waktu_awal" class="form-label">Waktu Awal</label>
              <input type="time" class="form-control" id="waktu_awal">
            </div>
            <div class="mb-3">
              <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
              <input type="time" class="form-control" id="waktu_akhir">
            </div>
            <a href="{{url('/admin/doctor')}}" class="btn btn-success">Back</a>
            <a onclick="store()" href="javascript:void(0)" class="btn btn-primary">Tambah Data</a>
        </form>
    </div>
</div>

<!-- Modal -->
@endsection

@push('scripts')
  <script>
    $('#doctor_id').change(function(){ 
        let id = $("#doctor_id").find(":selected").val();
        console.log(id);
        $.ajax({
            url:"{{url('/admin/doctor/')}}/"+id,
            type:"GET",
            success:function(response) {
                $("#spesialis").val(response['nama_spesialis']);
                $("#id_spesialis").val(response['id_spesialis']);
            },
            error:function(response){
                console.log('Tidak Ada Data');
            }

            });
    });

    function store() {
        console.log($("#doctor_id").find(":selected").val())
        console.log($("#id_jadwal").find(":selected").val())
        console.log($("#waktu_awal").val())
        console.log($("#waktu_akhir").val())
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apakah Data Sudah Benar ?',
        text: "Data akan di Simpan di Database",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            url:"/admin/praktik/store",
            type:"POST",

            data:{
                _token:"{{csrf_token()}}",
                doctor_id:$("#doctor_id").find(":selected").val(),
                id_jadwal:$("#id_jadwal").find(":selected").val(),
                waktu_awal:$("#waktu_awal").val(),
                waktu_akhir:$("#waktu_akhir").val(),
            },
            success:function(response) {
                Swal.fire(
                response[0]['title'],
                response[0]['msg'],
                response[0]['type']
                ).then(function() {
                    location.reload();
                });
            },
            error:function(response){
                Swal.fire(
                response[0]['title'],
                response[0]['msg'],
                response[0]['type']
                ).then(function() {
                    location.reload();
                });
            }

            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            
        }
        })
    }
  </script>
@endpush