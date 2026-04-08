<thead>
    <tr class="bg-surface-container-high/50 border-b border-outline-variant/10">
        @foreach($headers as $header)
            <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">
                {{ $header }}
            </th>
        @endforeach
    </tr>
</thead>
<tbody>
    @foreach($rows as $row)
        <tr class="hover:bg-surface-container-highest/30 transition-colors group">
            @foreach($row as $cell)
                <td class="px-6 py-4 text-sm font-label text-on-surface-variant">

                    {{ $cell }}
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>