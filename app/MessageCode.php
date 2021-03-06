<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14 0014
 * Time: 14:49
 */

namespace App;


use Carbon\Carbon;

class MessageCode extends BaseModel
{
    const TABLE_NAME = 'message_codes';
    protected $table = self::TABLE_NAME;

    /** Field id */
    const FIELD_ID = 'id';

    /** Field mobile */
    const FIELD_MOBILE = 'mobile';

    /** Field code */
    const FIELD_CODE = 'code';

    /** Field status 发送状态1=成功，2=失败 */
    const FIELD_STATUS = 'status';

    /** field created_at */
    const FIELD_CREATED_AT = 'created_at';

    /** field updated_at */
    const FIELD_UPDATED_AT = 'updated_at';

    /** field deleted_at */
    const FIELD_DELETED_AT = 'deleted_at';

    /** 发送成功 */
    const STATUS_SUCCESS = 1;
    /** 发送失败 */
    const STATUS_FAIL = 2;

    protected $fillable = [
        self::FIELD_ID,
        self::FIELD_CODE,
        self::FIELD_MOBILE,
        self::FIELD_CREATED_AT,
        self::FIELD_UPDATED_AT,
        self::FIELD_DELETED_AT
    ];

    public static function getEffectMessageCode($mobile,$code)
    {
        $result = MessageCode::query()
            ->where(MessageCode::FIELD_MOBILE,$mobile)
            ->where(MessageCode::FIELD_CODE,$code)
            ->where(MessageCode::FIELD_UPDATED_AT,'<=',Carbon::now())
            ->first();

        return $result;
    }

}