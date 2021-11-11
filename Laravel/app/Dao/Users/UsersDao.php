<?php 
    namespace App\Dao\Users;

    use App\Contracts\Dao\Users\UsersInterface;
    use App\Models\User;

    class UsersDao implements UsersInterface
    {
        public function store($request){
            $cover_img = $request->file('cover_img');
            $new_cover = rand() . '.' . $cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('images'), $new_cover); 
            $profile_img = $request->file('cover_img');
            $new_profile = rand() . '.' . $profile_img->getClientOriginalExtension();
            $profile_img->move(public_path('images'), $new_profile);
            $user = new User;
            $user->cover_img = $cover_img;
            $user->profile_img = $profile_img;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->bio = $request->bio;
            $user->github = $request->github;
            $user->linkedin = $request->linkedin;
            $user->date_of_birth = $request->date_of_birth;
            $user->ph_no = $request->ph_no;
            $user->position = $request->name;
            $user->save();
            return $user;
        }

        public function getUser($id)
        {
            $data = User::findOrFail($id);
            return $data;
        }

        public function update($request, $id)
        {
            $cover_img = $request->file('cover_img');
            $new_cover = rand() . '.' . $cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('images'), $new_cover); 
            $profile_img = $request->file('cover_img');
            $new_profile = rand() . '.' . $profile_img->getClientOriginalExtension();
            $profile_img->move(public_path('images'), $new_profile);
            $user = User::findOrFail($id);
            $user->cover_img = $cover_img;
            $user->profile_img = $profile_img;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->bio = $request->bio;
            $user->github = $request->github;
            $user->linkedin = $request->linkedin;
            $user->date_of_birth = $request->date_of_birth;
            $user->ph_no = $request->ph_no;
            $user->position = $request->name;
            $user->save();
            return $user;
        }
    }