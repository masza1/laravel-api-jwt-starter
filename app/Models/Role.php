<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public const SUPER_ADMIN = 'Super Admin';
    public const ADMIN_PELAYANAN = 'Admin Pelayanan';
    public const ADMIN_PENJUALAN = 'Admin Penjualan';
    public const MANAGER_KASUS = 'Manager Kasus';
    public const OPERATOR = 'Operator';
    public const ASSESSOR = 'Assessor';
    public const EVALUATOR = 'Evaluator';
    public const TERAPIS = 'Terapis';
    public const KLIEN = 'Klien';

    use HasFactory, HasUuids;
    protected $primaryKey = 'uuid';
    
    
    public function idsPermission(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->permissions->pluck('uuid')->toArray()
        );
    }
}
