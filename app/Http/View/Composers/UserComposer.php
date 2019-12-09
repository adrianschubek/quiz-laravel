<?php


namespace App\Http\View\Composers;


use App\Like;
use App\Support\Traits\FormatsNumbers;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class UserComposer
{
    use FormatsNumbers;

    public function compose(View $view)
    {
        $view->with('quiz_count', $this->numformat(
            $view->user->quizzes()->count())
        );

        $view->with('likes', $this->numformat(
            Like::whereIn('likeable_id',
                fn(Builder $builder) => $builder
                    ->select('id')
                    ->from('quizzes')
                    ->where('user_id', $view->user->id)
            )->count())
        );
    }
}
