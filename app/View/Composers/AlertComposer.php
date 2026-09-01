<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AlertComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $user = Auth::user();

        if (! $user) {
            $view->with([
                'overdueInvoice' => null,
                'expiringDomain' => null,
            ]);

            return;
        }

        $overdueInvoice = $user->invoices()
            ->where(function ($query) {
                $query->where('status', 'overdue')
                    ->orWhere(function ($q) {
                        $q->where('status', 'unpaid')
                            ->where('due_at', '<', now());
                    });
            })
            ->first();

        $expiringDomain = $user->domains()
            ->where('status', 'active')
            ->where('expires_at', '<=', now()->addDays(30))
            ->first();

        $view->with([
            'overdueInvoice' => $overdueInvoice,
            'expiringDomain' => $expiringDomain,
        ]);
    }
}
