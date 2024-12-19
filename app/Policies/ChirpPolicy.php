<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\Response;
//ในโค้ดนี้เป็นการกำหนด ChirpPolicy เพื่อจัดการสิทธิ์การเข้าถึง Chirp ของผู้ใช้ //
class ChirpPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool    /*ใช้ตรวจสอบว่าผู้ใช้สามารถดูรายการ Chirp ทั้งหมดได้ไหม*/
    {
        return false; /*ไม่ได้จ้าา*/ 
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chirp $chirp): bool  //ฟังก์ชัน view ใช้วิธีเดียวกันเพื่อดูโพสต์เฉพาะ โดยถ้าผู้ใช้ไม่ได้เป็นเจ้าของโพสต์นั้น ก็ไม่สามารถดูได้//
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool    /*ฟังก์ชัน create และ restore จะคืนค่า false เพราะไม่มีผู้ใช้คนไหนสามารถสร้างหรือกู้คืนโพสต์ได้ */
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool /*ฟังก์ชัน update และ deleteจะตรวจสอบว่าผู้ใช้เป็นเจ้าของโพสต์นั้นๆ ก่อน ซึ่งถ้าใช่จะสามารถแก้ไขหรือลบโพสต์ได้" */
    {
        return $chirp->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        return $this->update($user, $chirp);  //  user
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chirp $chirp): bool   //
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chirp $chirp): bool
    {
        return false;
    }
}
//ใช้ฟังก์ชัน forceDeleteจะตรวจสอบว่าผู้ใช้สามารถลบ Chirp แบบถาวรได้หรือไม่ //
//ซึ่งในกรณีนี้จะคืนค่า false เสมอ นั่นหมายความว่า ไม่มีผู้ใช้คนไหนที่สามารถลบโพสต์ถาวรได้//