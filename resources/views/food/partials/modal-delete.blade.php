<div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Are you sure want to delete?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          <h4 class="text-dark">{{ $food->name }}</h4>
        </div>
        <div class="modal-footer">
                <form action="{{ route('food.destroy', [$food->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
        </div>
      </div>
    </div>
  </div>