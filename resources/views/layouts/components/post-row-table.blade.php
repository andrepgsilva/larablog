<tr>
    <td>{{ $title }}</td>
    <td>{{ $article }}</td>
    <td>{{ $tags }}</td>
    <td>{{ $created_at }}</td>
    <td>{{ $updated_at }}</td>
    <td class="text-center">
<<<<<<< HEAD
        <a href="" class="text-danger">
            <i class="fa fa-trash"></i>
        </a>
    </td>
    <td class="text-center">
        <a href="" class="text-primary">
            <i class="fa fa-edit"></i>
        </a>
=======
        <a href="/posts/{{ $id }}/edit" class="text-primary">
            <i class="fa fa-edit"></i>
        </a>
    </td>
    <td class="text-center">
        <form action="/posts/{{ $id }}" method="POST">
            @csrf
            @method('DELETE')

            <a class="text-danger" type="submit">
                <i class="fa fa-trash"></i>
            </a>
        </form>
>>>>>>> develop
    </td>
</tr>