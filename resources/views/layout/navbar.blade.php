@extends('layout.main')

@section('navbar')
<li class="nav-item">
<a class="nav-link" href="/app/create">Add New Admin</a>
<li class="nav-item">
<a class="nav-link" href="/app/createmanager">Create New Manager</a>
<li>
<li class="nav-item">
<a class="nav-link" href="/app/users">Search User</a>
@endsection

@section('dropdown')
<a class="dropdown-item" href="/app/adminlist">Admin List</a>
<a class="dropdown-item" href="/app/managerlist">Manager List</a>
<a class="dropdown-item" href="/app/userlist">User List</a>
<a class="dropdown-item" href="/app/salarylist">Salarylist</a>
<a class="dropdown-item" href="/app/transaction">Transactions</a>

@endsection

@section('logout')
<li class="nav-item">
<a class="nav-link" href="/app/logout">Logout</a>
<li>
@endsection


