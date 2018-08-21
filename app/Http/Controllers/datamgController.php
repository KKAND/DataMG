mespace App\Http\Controllers;

use App\datamg;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //成员信息页面
    public function index()
    {

        //$students = Student::get();
        $students = datamg::paginate(10);

        //$students = Student::paginate(20);
        return view('datamg.adata',
            [
               'students'=>$students,
            ]
        );
    }
}
}

