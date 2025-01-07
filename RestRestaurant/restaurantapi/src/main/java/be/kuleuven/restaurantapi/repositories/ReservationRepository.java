package be.kuleuven.restaurantapi.repositories;

import be.kuleuven.restaurantapi.model.Reservation;
import org.springframework.data.jpa.repository.JpaRepository;
import java.time.ZonedDateTime;
import java.util.List;
import java.util.Optional;

public interface ReservationRepository extends JpaRepository<Reservation, Long>{
    public Optional<Reservation> findById(Long id);

    public List<Reservation> findByTableId(Long tableId);

    public List<Reservation> findByTableIdAndDateTimeBetween(Long tableId, ZonedDateTime startDateTime, ZonedDateTime endDateTime);
}
