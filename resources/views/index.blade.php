@extends('layouts.default')

@section('content')

<div class="content-body">
  <div class="row">
    <div class="col-12">
      <div class="alert alert-primary" role="alert">
        <div class="alert-body">
          <!-- Bordered table start -->
          <div class="row" id="table-bordered">
            <div class="col-12">
              <div class="card">
                <div class="card-header border-bottom p-1">
                  <div class="head-label">
                    <h6 class="mb-0">Book Store Table With Search</h6>
                  </div>
                  <div class="dt-action-buttons text-end">
                    <div class="dt-buttons d-inline-flex">
                      <button
                        class="dt-button create-new btn btn-primary"
                        tabindex="0"
                        aria-controls="DataTables_Table_0"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#modals-slide-in"
                        >
                        <span
                          >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-plus me-50 font-small-4"
                            >
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line
                              x1="5"
                              y1="12"
                              x2="19"
                              y2="12"
                              ></line>
                          </svg
                            >
                          Add New Record
                        </span
                          >
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  @if(session()->has('message'))
                  <div class="alert alert-success mt-2 px-2 py-2" role="alert">
                    {{ session()->get('message') }}
                  </div>
                  @endif
                  <form class="dt_adv_search mt-2" method="get" action="{{ route('books.store.search') }}">
                    <div class="row g-1 mb-md-1">
                      <div class="col-md-4">
                        <label class="form-label">Author Name:</label>
                        <input
                          type="text"
                          value="{{ Request::get('author') }}"
                          name="author"
                          class="form-control dt-input dt-full-name"
                          data-column="1"
                          placeholder="Author name"
                          data-column-index="0"
                          />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Book Name:</label>
                        <input
                          type="text"
                          value="{{ Request::get('book_name') }}"
                          name="book_name"
                          class="form-control dt-input"
                          data-column="3"
                          placeholder="Sherlock Holmes"
                          data-column-index="2"
                          />
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Date:</label>
                        <div class="mb-0">
                          <input
                            type="text"
                            name="date"
                            value="{{ Request::get('date') }}"
                            class="form-control dt-date flatpickr-range dt-input"
                            data-column="5"
                            placeholder="StartDate to EndDate"
                            data-column-index="4"
                            name="dt_date"
                            />
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Best Seller:</label>
                        <div class="form-check mt-1">
                          <input
                            class="form-check-input"
                            name="best_seller_true"
                            type="checkbox"
                            id="inlineCheckbox1"
                            value="true"
                            {{ (Request::get('best_seller_true')==true || Request::get('best_seller_true')=='true')?'CHECKED':'' }}
                            />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox1"
                            >True</label
                            >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label invisible">Best Seller:</label>
                        <div class="form-check mt-1">
                          <input
                            class="form-check-input"
                            name="best_seller_false"
                            type="checkbox"
                            id="inlineCheckbox2"
                            value="true"
                            {{ (Request::get('best_seller_false')==true || Request::get('best_seller_false')=='true')?'CHECKED':'' }}
                            />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox2"
                            >False</label
                            >
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary data-submit w-100 mt-md-1">
                          Search
                        </button>
                      </div>
                    </div>
                    <div class="row g-1">
                      
                    </div>
                  </form>
                  <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Book Name</th>
                          <th>Author</th>
                          <th>Publish Date</th>
                          <th>Best Seller</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($books_store as $key => $value)
                        <tr>
                          <td>
                            <span class="fw-bold">{{ $value->book_name }}</span>
                          </td>
                          <td>{{ $value->author }}</td>
                          <td>
                            {{ date("d-M-Y" , strtotime($value->publish_year)) }}
                          </td>
                          <td>
                            {{ $value->best_seller?'True':'False' }}
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                data-bs-toggle="dropdown"
                                >
                              <i data-feather="more-vertical"></i>
                              </button>
                              <div
                                class="dropdown-menu dropdown-menu-end"
                                >
                                <a class="dropdown-item" href="#edit-modals-slide-in" onclick="editRecord({{ json_encode($value) }})" data-bs-toggle="modal">
                                  <i
                                    data-feather="edit-2"
                                    class="me-50"
                                  ></i>
                                  <span>Edit</span>
                                </a>
                                <a class="dropdown-item" href="#deleteBook" data-bs-toggle="modal" onclick="deleteStore({{ $value->id }})">
                                  <i
                                    data-feather="trash"
                                    class="me-50"
                                  ></i>
                                  <span>Delete</span>
                                </a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        @if(count($books_store)==0)
                        <tr>
                          <td class="text-center" colspan="5">
                            <span class="fw-bold">No Rocord Found</span>
                          </td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Bordered table end -->
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal to edit new record -->
<div class="modal modal-slide-in fade" id="edit-modals-slide-in">
  <div class="modal-dialog sidebar-sm">
    <form action="" id="edit_form" method="post" class="add-new-record modal-content pt-0 needs-validation" novalidate>
      {{ csrf_field() }}
      {{ method_field('put') }}
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        >
      ×
      </button>
      <div class="modal-header mb-1">
        <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
      </div>
      <div class="modal-body flex-grow-1">
        <div class="mb-1">
          <label class="form-label" for="basic-icon-default-fullname"
            >Author Name</label
            >
          <input
            name="author"
            required
            type="text"
            class="form-control dt-full-name"
            id="edit_author"
            placeholder="Author Name"
            aria-label="Author Name"
            />
          <div class="invalid-feedback">
            Athor Name is required.
          </div>
        </div>
        <div class="mb-1">
          <label class="form-label" for="basic-icon-default-post"
            >Book Name</label
            >
          <input
            name="book_name"
            required
            type="text"
            id="edit_book"
            class="form-control dt-post"
            placeholder="Book Name"
            aria-label="Book Name"
            />
          <div class="invalid-feedback">
            Book Name is required.
          </div>
        </div>
        <div class="mb-1">
          <label class="form-label" for="edit_publish_date">Publish Date</label>
          <input name="publish_year" required type="text" id="edit_publish_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          <div class="invalid-feedback">
            Publish Date is required.
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label">Best Seller:</label>
          <div class="form-check">
            <input
              name="best_seller"
              class="form-check-input"
              type="checkbox"
              id="edit_inlineCheckbox1"
              value="true"
              />
            <label
              class="form-check-label"
              for="edit_inlineCheckbox1"
              >True</label
              >
          </div>
        </div>
        <button type="submit" class="btn btn-primary data-submit me-1">
        Update Data
        </button>
        <button
          type="reset"
          class="btn btn-outline-secondary"
          data-bs-dismiss="modal"
          >
          Cancel
        </button>
      </div>
    </form>
  </div>
</div>


<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in">
  <div class="modal-dialog sidebar-sm">
    <form action="{{ route('books.store') }}" method="post" class="add-new-record modal-content pt-0 needs-validation" novalidate>
      {{ csrf_field() }}
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        >
      ×
      </button>
      <div class="modal-header mb-1">
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
      </div>
      <div class="modal-body flex-grow-1">
        <div class="mb-1">
          <label class="form-label" for="basic-icon-default-fullname"
            >Author Name</label
            >
          <input
            name="author"
            required
            type="text"
            class="form-control dt-full-name"
            id="basic-icon-default-fullname"
            placeholder="Author Name"
            aria-label="Author Name"
            />
          <div class="invalid-feedback">
            Athor Name is required.
          </div>
        </div>
        <div class="mb-1">
          <label class="form-label" for="basic-icon-default-post"
            >Book Name</label
            >
          <input
            name="book_name"
            required
            type="text"
            id="basic-icon-default-post"
            class="form-control dt-post"
            placeholder="Book Name"
            aria-label="Book Name"
            />
          <div class="invalid-feedback">
            Book Name is required.
          </div>
        </div>
        <div class="mb-1">
          <label class="form-label" for="fp-default">Publish Date</label>
          <input name="publish_year" value="{{ date('Y-m-d') }}" required type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
          <div class="invalid-feedback">
            Publish Date is required.
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label">Best Seller:</label>
          <div class="form-check">
            <input
              name="best_seller"
              class="form-check-input"
              type="checkbox"
              id="inlineCheckbox1"
              value="true"
              />
            <label
              class="form-check-label"
              for="inlineCheckbox1"
              >True</label
              >
          </div>
        </div>
        <button type="submit" class="btn btn-primary data-submit me-1">
          Add Data
        </button>
        <button
          type="reset"
          class="btn btn-outline-secondary"
          data-bs-dismiss="modal"
          >
          Cancel
        </button>
      </div>
    </form>
  </div>
</div>
<!-- Modal to delete book  -->


<!-- Delete Modal [START] -->
<div class="modal fade modal-danger text-start" id="deleteBook" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel120">Delete Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Record ?
      </div>
      <div class="modal-footer">
        <form id="assign_url" action="" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
        </form>
        <button
          type="reset"
          class="btn btn-outline-secondary"
          data-bs-dismiss="modal"
          >
        Cancel
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal [END] -->

<script type="text/javascript">
  function editRecord(object) {
    console.log("ASDASD" , object)
    let action = '/update/'+object.id;
    document.getElementById("edit_form").setAttribute("action", action)

    document.getElementById('edit_author').value = object.author;
    document.getElementById('edit_book').value = object.book_name;
    document.getElementById('edit_publish_date').value = object.publish_year;
    document.getElementById('edit_inlineCheckbox1').checked = object.best_seller=='1'?true:false;
  }

  function deleteStore(bookStoreId) {
    let action = '/record/delete/'+bookStoreId;
    document.getElementById("assign_url").setAttribute("action", action)
    return false;
  }
</script>
@endsection