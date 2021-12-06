<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mt-5">
                <form action="/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name" >Name</label>
                    <input type="text" name="name">
                    <label for="email" >Email</label>
                    <input type="text" name="email">
                
                <button type="submit">Save!</button>
                
                </form> 
                    <table class="table table-bordered mb-5">
                        <tr class="table-success">
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th> 
                            </tr>
                        @foreach ($members as $member)
                        <tr>
                            
                            <td>{{$member['id']}}</td>
                            <td>{{$member['Name']}}</td>
                            <td>{{$member['Email']}}</td>
                            </tr>
                         
                        @endforeach
                    </table>
                <div class="d-flex justify-content-center">{{$members->links()}}</div>
                
            </div>
        </div>
    </div>
</div>



</x-app-layout>