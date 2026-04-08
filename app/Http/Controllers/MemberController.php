<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller {
    public function index() {
        return view('members.index', ['members' => Member::latest()->get()]);
    }

    public function create() {
        return view('members.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        Member::create($data);
        return redirect()->route('members.index')->with('success', 'Anggota berhasil didaftarkan.');
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $member->update($data);
        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Member $member) {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
