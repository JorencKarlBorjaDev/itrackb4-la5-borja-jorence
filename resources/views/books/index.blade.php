@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-4">

            <h2 class="h5 text-muted text-uppercase fw-semibold mb-1">Books List</h2>

            <h2 class="text-secondary small mb-4">Prepared by: Jorence Karl Borja</h2>

            <p class="mb-3">
                <strong class="me-2 text-dark">Genre:</strong>
                <a href="{{ route('books.index', ['genre' => 'History', 'year' => $year]) }}" class="btn btn-sm btn-outline-primary rounded-pill me-1">History</a>
                <a href="{{ route('books.index', ['genre' => 'Fiction', 'year' => $year]) }}" class="btn btn-sm btn-outline-primary rounded-pill">Fiction</a>
            </p>


            <p class="mb-3">
                <strong class="me-2 text-dark">Year:</strong>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 1861]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1861</a>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 1939]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1939</a>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 2012]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">2012</a>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 1812]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1812</a>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 1941]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1941</a>
                <a href="{{ route('books.index', ['genre' => $genre, 'year' => 1869]) }}" class="btn btn-sm btn-outline-secondary rounded-pill">1869</a>
            </p>

            <p class="mb-4">
                <a href="{{ route('books.index') }}" class="btn btn-sm btn-link text-danger text-decoration-none p-0">
                    Clear filters
                </a>
            </p>

            <p class="bg-light p-3 rounded-3 border mb-4">
                <strong class="text-dark me-2">Showing:</strong>

                @if ($genre)
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Genre = {{ $genre }}</span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Genre = None</span>
                @endif

                ,

                @if ($year)
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Year = {{ $year }}</span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Year = None</span>
                @endif
            </p>


            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3">#</th>
                            <th scope="col" class="py-3">Title</th>
                            <th scope="col" class="py-3">Author</th>
                            <th scope="col" class="py-3">Year</th>
                            <th scope="col" class="py-3">Category</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($books as $book)

                            <tr>

                                <td class="fw-semibold text-muted">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <a href="{{ route('books.show', ['book' => $book['id']]) }}" class="text-decoration-none fw-medium link-primary">
                                        {{ $book['title'] }}
                                    </a>
                                </td>

                                <td class="text-secondary">
                                    {{ $book['author'] }}
                                </td>

                                <td class="text-secondary">
                                    {{ $book['year'] }}
                                </td>

                                <td>
                                    @if ($book['year'] >= 2000)

                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2">
                                            Modern
                                        </span>

                                    @else

                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-2">
                                            Classic
                                        </span>

                                    @endif
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-5 text-muted">
                                    No books are currently available.
                                </td>

                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>

@endsection