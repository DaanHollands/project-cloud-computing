package be.kuleuven.restaurantapi.repositories;

import be.kuleuven.restaurantapi.model.Reservation;
import org.springframework.data.jpa.repository.JpaRepository;
import java.time.LocalDateTime;
import java.util.List;

public interface ReservationRepository extends JpaRepository<Reservation, Long>{
    public List<Reservation> findByTableId(Long tableId);

    public List<Reservation> findByTableIdAndDateTimeBetween(Long tableId, LocalDateTime startDateTime, LocalDateTime endDateTime);
}
