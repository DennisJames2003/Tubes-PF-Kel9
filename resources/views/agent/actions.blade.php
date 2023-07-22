<div class="d-flex">
    <a href="{{ route('agents.show', ['agent' => $agent->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
    <a href="{{ route('agents.edit', ['agent' => $agent->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('agents.destroy', ['agent' => $agent->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"
            data-name="{{ $agent->firstname.' '.$agent->lastname }}">
                <i class="bi-trash"></i>
            </button>
        </form>
    </div>
</div>
