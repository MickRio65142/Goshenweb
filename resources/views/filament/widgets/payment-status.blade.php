<x-filament::widget>
    <x-filament::section>
        <x-slot name="heading">
            <div class="flex items-center gap-2">
                <x-filament::icon icon="heroicon-o-banknotes" class="w-5 h-5 text-warning-500" />
                Payment Status
            </div>
        </x-slot>

        @php
            $enrollments = $this->getEnrollments();
        @endphp

        @if($enrollments->isEmpty())
            <p class="text-sm text-gray-500">All payments are up to date.</p>
        @else
            <div class="space-y-3">
                @foreach($enrollments as $enrollment)
                    <div class="flex items-center justify-between p-3 rounded-lg border" 
                         :class="{
                             'border-warning-300 bg-warning-50': '{{ $enrollment->payment_status }}' === 'partial' || '{{ $enrollment->payment_status }}' === 'pending',
                             'border-danger-300 bg-danger-50': '{{ $enrollment->payment_status }}' === 'overdue'
                         }">
                        <div>
                            <p class="text-sm font-medium">{{ $enrollment->course->title }}</p>
                            <p class="text-xs text-gray-500">
                                Status: 
                                <span class="font-semibold 
                                    @switch($enrollment->payment_status)
                                        @case('overdue') text-danger-600 @break
                                        @case('partial') text-warning-600 @break
                                        @default text-gray-600 @endswitch
                                ">{{ ucfirst($enrollment->payment_status) }}</span>
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-danger-600">
                                {{ number_format($enrollment->outstanding_balance, 0, ',', ' ') }} CFA
                            </p>
                            <p class="text-xs text-gray-500">outstanding</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </x-filament::section>
</x-filament::widget>
