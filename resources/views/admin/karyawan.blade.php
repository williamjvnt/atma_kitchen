@extends('admin/dashboard')

@section('title', 'Make Up')
@section('content')

<div class="container">
    <h1>Atma Kitchen - Daftar Karyawan</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah</a>
    <form class="mb-3">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Role</th>
                <th>No Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->role }}</td>
                <td>{{ $employee->phone_number }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>