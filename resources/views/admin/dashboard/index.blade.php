<x-admin-layout>
    <div class="toolbar">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <span class="text-sm text-gray-500">Overview of current operations</span>
    </div>

    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-label">Total bookings</div>
            <div class="stat-value">{{ $totalBookings }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Pending bookings</div>
            <div class="stat-value">{{ $pendingBookings }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Total revenue</div>
            <div class="stat-value text-primary">{{ number_format($totalRevenue) }} VND</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Active routes</div>
            <div class="stat-value">{{ $activeRoutes }}</div>
        </div>
    </div>

    <div class="dashboard-charts">
        <section class="chart-card">
            <div class="chart-title">Booking Status Breakdown</div>
            @php
                $maxStatus = max(1, $pendingBookings, $confirmedBookings, $cancelledBookings);
            @endphp
            <div class="bar-list">
                <div class="bar-row">
                    <div class="bar-label">Pending</div>
                    <div class="bar-track">
                        <div class="bar-fill pending" style="width: {{ ($pendingBookings / $maxStatus) * 100 }}%"></div>
                    </div>
                    <div class="bar-value">{{ $pendingBookings }}</div>
                </div>
                <div class="bar-row">
                    <div class="bar-label">Confirmed</div>
                    <div class="bar-track">
                        <div class="bar-fill confirmed" style="width: {{ ($confirmedBookings / $maxStatus) * 100 }}%"></div>
                    </div>
                    <div class="bar-value">{{ $confirmedBookings }}</div>
                </div>
                <div class="bar-row">
                    <div class="bar-label">Cancelled</div>
                    <div class="bar-track">
                        <div class="bar-fill cancelled" style="width: {{ ($cancelledBookings / $maxStatus) * 100 }}%"></div>
                    </div>
                    <div class="bar-value">{{ $cancelledBookings }}</div>
                </div>
            </div>
        </section>

        <section class="chart-card">
            <div class="chart-title">Confirmed Revenue (Last 7 Days)</div>
            @php
                $maxRevenue = max(1, $dailyRevenue->max('value'));
            @endphp
            <div class="rev-chart">
                @foreach($dailyRevenue as $item)
                    <div class="rev-col">
                        <div class="rev-bar-wrap">
                            <div class="rev-bar" style="height: {{ ($item['value'] / $maxRevenue) * 100 }}%"></div>
                        </div>
                        <div class="rev-day">{{ $item['label'] }}</div>
                        <div class="rev-value">{{ number_format($item['value']) }}</div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-admin-layout>
