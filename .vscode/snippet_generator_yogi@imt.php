<?php
// ===========================================================
// SERVICE MODEL
namespace App\Services\/${1:Folder};

use App\Services\/${2:OtherServices}\/${3:TheModel};
use Illuminate\Database\Eloquent\Model;

class ${4:ClassName}Model extends Model
{
    protected $$table = '${5:table}';

    protected $$fillable = [
        '${6:title}',
        '${7:text}',
        '$8',
        '$9'
    ];

    public function ${10:otherServiceFunc}()
    {
        return $$this->belongsTo(/${3:TheModel}::class, 'user_id', 'id');
    }
}
// ===========================================================
// SERVICE REPOSITORY
namespace App\Services\/${1:Folder};

use Illuminate\Support\Facades\Auth;

class ${2:ClassName}Repository
{

    public function index()
    {
        return ${3:ClassmModel}::paginate(15);
    }

    public function getById($$id)
    {
        return ${3:ClassmModel}::findOrFail($$id);
    }

    public function create($$data)
    {
        return ${3:ClassmModel}::create(array_merge(
            $$data, ['user_id' => Auth::user()->id]
        ));
    }

    public function delete($$id)
    {
        return ${3:ClassmModel}::destroy($$id);
    }

    public function update($$id, array $$data)
    {
        $${4:parameter_name} = $this->getById($$id);
        $${4:parameter_name}->update($$data);

        return $${4:parameter_name};
    }

}



// ===========================================================
// SERVICE REQUEST
namespace App\Services\/${1:Folder};

use App\Http\Requests\RequestValidation;

class ${2:ClassName}Request extends RequestValidation
{
    public function rules(): array
    {
        return [
            '${3:title}' => 'required|string',
            '${4:text}' => 'required|string',
            '$5' => 'required|string',
            '$6' => 'required|string',
            '$7' => 'required|string',
        ];
    }
}


// SERVICE TRANSFORMER
namespace App\Services\/${1:Folder};

use App\Services\Transformer;
use App\Services\/${2:OtherServices}\/${3:TheTransformer};

class ${4:ClassName}Transformer extends Transformer
{

    protected $$type = '${5:notes}';

    protected $$availableIncludes = ['${6:tables_want_to_include}'];

    /**
     * @param model ${4:ClassName}
     * @return array
     */
    public function transform($$model)
    {
        return [
            'id' => $$model->getAttribute('id'),
            '${7:title}' => $$model->getAttribute('${7:title}'),
            '${8:text}' => $$model->getAttribute('${8:text}'),
            '${9:user_id}' => $$model->getAttribute('${9:user_id}'),
            'created_at' => $$model->getAttribute('created_at'),
            'updated_at' => $$model->getAttribute('updated_at'),
        ];
    }

    /**
     * @param ${10:param}
     * @return \League\Fractal\Resource\Item
     */
    public function includeUsers(${10:param})
    {
        return $$this->item($${10:param}->${11:objectname}, new /${3:TheTransformer}(), '${6:tables_want_to_include}');
    }
}