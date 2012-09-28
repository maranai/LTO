package com.edify.db;

import com.edify.config.ApplicationConfig;
import com.edify.model.User;
import com.edify.repositories.UserRepository;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

/**
 * @author: <a href="https://github.com/jarias">jarias</a>
 */
public class Seed {
    public static void main(String[] args) {
        ApplicationContext context = new AnnotationConfigApplicationContext(ApplicationConfig.class);

        UserRepository userRepository = context.getBean(UserRepository.class);

        User user = new User();
        user.setFirstName("Julio");
        user.setLastName("Arias");
        user.setUsername("jarias@test.org");
        user.setPassword("123");

        userRepository.save(user);

        for (int i = 0; i < 20; i++) {
            User u = new User();
            u.setFirstName(String.valueOf(i));
            u.setLastName(String.valueOf(i));
            u.setUsername(String.valueOf(i) + "@test.org");
            u.setPassword("123");
            userRepository.save(u);
        }
    }
}
