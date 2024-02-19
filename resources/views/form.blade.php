<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-6" style="margin-top: 30vh;">
        <div class="row">
          <div class="col-12">
            {{-- alert notifikasi success add data --}}
            @if(session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-black-50">
                  
                    {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
          </div>
          <div class="col-12">
            <button class="btn btn-primary mb-3"data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Student</button>
          </div>
          <div class="col-12">
            <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nis</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <th scope="row">{{ $student->id }}</th>
                  <td>{{ $student->nama }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->nis }}</td>
                  <td>
                    <form action="{{ route('student.delete', ['id' => $student->id]) }}" method="POST">
                      @csrf
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <button class="btn btn-primary" onclick="openModalUpdate('{{ $student->nama }}','{{ $student->email }}','{{ $student->nis }}','{{ $student->id }}')">Update</button>
                  </td>
                </tr>
                  
                @endforeach
                
              </tbody>
            </table>

          </div>
        </div>

      </div>

    </div>







  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('student.add') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Name : </label>
            <input type="text" class="form-control" id="name" name="name">

            <label for="email" class="form-label">Email : </label>
            <input type="text" class="form-control" id="email" name="email">

            <label for="nis" class="form-label">NIS : </label>
            <input type="text" class="form-control" id="nis" name="nis">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal edit --}}
  <div class="modal fade" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-update-label">Edit Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('student.update') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Name : </label>
            <input type="text" name="id" hidden readonly id="id">
            <input type="text" class="form-control" id="name-update" name="name">

            <label for="email" class="form-label">Email : </label>
            <input type="text" class="form-control" id="email-update" name="email">

            <label for="nis" class="form-label">NIS : </label>
            <input type="text" class="form-control" id="nis-update" name="nis">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <script>
      $(document).ready(function () {
        console.log('asd');






      });



      function openModalUpdate(name,email,nis,id) {
        $("#id").val(id);
        $("#nis-update").val(nis);
        $("#email-update").val(email);
        $("#name-update").val(name);
        $("#modal-update").modal('show');
      }

      
    </script>


  </body>
</html>