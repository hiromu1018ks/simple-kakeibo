@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">収支一覧</h1>

        <a href="#" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded">新規追加</a>

        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="p-2">日付</th>
                <th class="p-2">種別</th>
                <th class="p-2">金額</th>
                <th class="p-2">カテゴリ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entries as $entry)
                <tr class="border-t">
                    <td class="p-2">{{ $entry->spent_at->format('Y-m-d') }}</td>
                    <td class="p-2">{{ $entry->type === '+' ? '収入' : '支出' }}</td>
                    <td class="p-2">{{ number_format($entry->amount) }} 円</td>
                    <td class="p-2">{{ $entry->category }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
