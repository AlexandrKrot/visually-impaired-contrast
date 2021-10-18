<?php




class WicWidget extends WP_Widget {

    /**
     *
     */
    function __construct() {
        parent::__construct(
            'true_top_widget',
            'Переключение для людей з вадами зору', // заголовок виджета
            array( 'description' => 'Показує кнопку, що переключає версію сайту' ) // описание
        );
    }

    /**
     * @param $args
     * @param $instance
     */
    public function widget( $args, $instance ) {


        $title = apply_filters( 'widget_title', $instance['title'] );
        $posts_per_page = $instance['posts_per_page'];

        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . sprintf('<span class="wic-contast-btn">%s</span>',$title) . $args['after_title'];

        echo $args['after_widget'];
    }

    /*
     * бэкэнд виджета
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( isset( $instance[ 'posts_per_page' ] ) ) {
            $posts_per_page = $instance[ 'posts_per_page' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Текст або символ</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id( 'posts_per_page' ); ?><!--">Количество постов:</label>-->
<!--            <input id="--><?php //echo $this->get_field_id( 'posts_per_page' ); ?><!--" name="--><?php //echo $this->get_field_name( 'posts_per_page' ); ?><!--" type="text" value="--><?php //echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?><!--" size="3" />-->
<!--        </p>-->
        <?php
    }

    /*
     * сохранение настроек виджета
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
        return $instance;
    }
}
